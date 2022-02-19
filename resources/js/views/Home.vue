
<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div>
              <div class="mb-4">
                <b-dropdown text="Select Country">
                    <b-dropdown-item @click="filterByCountry(null)">All</b-dropdown-item>
                    <b-dropdown-item v-for="country in countriesList" :key="country.country_code"
                        @click="filterByCountry(country.country_code)"
                    >
                        {{country.country_name}}
                    </b-dropdown-item>
                </b-dropdown>

                <b-dropdown text="Select phone validity" class="mx-3">
                    <b-dropdown-item @click="filterByPhoneValidity(null)">All</b-dropdown-item>
                    <b-dropdown-item @click="filterByPhoneValidity(1)">Valid phone numbers</b-dropdown-item>
                    <b-dropdown-item @click="filterByPhoneValidity(0)">Invalid phone numbers</b-dropdown-item>
                </b-dropdown>
            </div>

            <b-table striped hover :items="phoneNumbers" :fields="fields">
                <!-- A custom formatted State column -->
                <template #cell(is_valid_phone)="data">
                    <b>
                        {{ data.value ? 'Ok' : 'NOK' }}
                    </b>
                </template>
            </b-table>
        </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    data() {
        return {
            phoneNumbers: [],
            phoneValidityFilter: null,
            countryFilter: null,
            countriesList: [],

            fields: [
                {
                    key: 'country',
                    sortable: true,
                },
                {
                    key: 'is_valid_phone',
                    label: 'State',
                    sortable: true,
                    tdClass: (value) =>  value ? 'bg-success' : 'bg-warning',
                },
                {
                    key: 'country_code',
                    sortable: true,
                },
                 {
                    key: 'phone_without_country_code',
                    label: 'Phone num.',
                },
            ],
        }
    },

    created(){
        this.getPhoneNumbersData();
        this.getCountriesList();
    },

    methods:{
        getPhoneNumbersData(){
            // conditionally add filters to data only in case they exist
            let data = {
            ...(this.phoneValidityFilter != null && {'is_valid_phones' : this.phoneValidityFilter} ),
            ...(this.countryFilter && {'country_code' : this.countryFilter} ),
            };

            axios.get('/api/phone-numbers', {params: data})
            .then( (response) => {
                this.phoneNumbers = response.data.data;
            })
            .catch(function (error) {
                console.log(error);
            });
        },

        getCountriesList(){
            axios.get('/api/countries-list')
            .then( (response) => {
                this.countriesList = response.data.data;
            })
            .catch(function (error) {
                console.log(error);
            });
        },

        filterByPhoneValidity(status){
            this.phoneValidityFilter = status;
            this.getPhoneNumbersData();
        },

        filterByCountry(countryCode){
            this.countryFilter = countryCode;
            this.getPhoneNumbersData();
        },


    },
}
</script>
