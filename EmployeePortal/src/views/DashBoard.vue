<script setup>
import axios from "axios";
import {ref, onMounted, computed} from "vue"

const employments = ref([]);
let searchstring = ref('');

const c_employments = computed(() => {
  if(searchstring.value == ""){
    return employments.value.filter((n) => n)
  }
  return employments.value.filter((n) => n['employer_name'].includes(searchstring.value))
})

const downloadCSV = () => {
  let csv = 'Id,Emplyer Name,Member Name,Start Date, End Date\n';
      c_employments.value.forEach((row) => {
        for(let key in row){
          csv += row[key];
        }
        csv += "\n";
      });
      const anchor = document.createElement('a');
      anchor.href = 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv);
      anchor.target = '_blank';
      anchor.download = 'housing.csv';
      anchor.click();
}

onMounted(() =>{
  axios.get('https://housing-api.stag.mpao.mv/employments/m000001/a', { headers: {'Authorization': 'Bearer ' + localStorage.getItem('accessToken')}
    
  }).then(response => {
    console.log(response.data)
    employments.value = response.data;
  })
})

const fetchEmployments = () => {
  axios.get('https://housing-api.stag.mpao.mv/employments/m000001/a', { headers: {'Authorization': 'Bearer ' + localStorage.getItem('accessToken')}
    
  }).then(response => {
    console.log(response.data)
    return response.data;
  })
}

</script>

<template>
  <main class="container m-auto w-full mt-4 p-2 bg-slate-300">
    <div class="mt-2 rounded-lg">
      <div class="flex justify-between">
        <div>
          <h1 class="font-bold text-xl text-gray-500">Employments</h1>
          <p class="text-gray-400">A list of all the employments for the individual including name, employer, start and end date</p>

        </div>

        <div>
          <form class="flex py-6">
            <a href="/logout"
                    class=" shadow-lg ml-4 text-white bg-slate-400 hover:bg-slate-600 focus:ring-4 focus:outline-none focus:ring-slate-300 font-small rounded-xl text-sm px-4 py-2">
              Logout
            </a>
          </form>
        </div>

      </div>
      <div class="flex justify-between items-center ">

        <div class="w-2/4">
          <div class="flex py-6">
            <input v-model="searchstring" type="search" id="search" class=" shadow-lg border w-full border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2"
                   placeholder="Search" required>
            <button 
                    class=" shadow-lg ml-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
              Search
            </button>
          </div>
  
        </div>
  
        <div>
  
          <button @click.prevent="downloadCSV"
                    class=" shadow-lg ml-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
              Downlod CSV
            </button>
        </div>
      </div>
      
    </div>
    <div class="shadow-lg overflow-x-auto relative border rounded-lg overflow-hidden border-slate-300">
      <table class="text-left rounded-xl w-full">
        <thead class="bg-gray-50 text-gray-700">
        <tr>
          <th scope="col" class="py-3 px-6 border border-slate-300 font-bold">
            ID
          </th>
          <th scope="col" class="py-3 px-6 border border-slate-300 font-bold">
            Full Name
          </th>
          <th scope="col" class="py-3 px-6 border border-slate-300 font-bold">
            Employer Name
          </th>
          <th scope="col" class="py-3 px-6 border border-slate-300 font-bold">
            Start Date
          </th>
          <th scope="col" class="py-3 px-6 border border-slate-300 font-bold">
            End Date
          </th>
        </tr>
        </thead>
        <tbody>
        <tr class="bg-white border-b text-gray-700" v-for="e in c_employments">
          <th scope="row"
              class="py-3 px-6 font-medium border border-slate-300">
            {{ e.id }}
          </th>
          <td class="py-3 px-6 border border-slate-300">
            {{ e.employer_name }}
          </td>
          <td class="py-3 px-6 border border-slate-300">
            {{ e.member_name }}
          </td>
          <td class="py-3 px-6 border border-slate-300">
            {{ new Date(e.start_date).toLocaleDateString('en-US') }}
          </td>
          <td class="py-3 px-6 border border-slate-300">
            {{ new Date(e.end_date).toLocaleDateString('en-US') }}
          </td>
        </tr>
        </tbody>
      </table>
    </div>

  </main>
</template>
