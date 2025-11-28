<template>
  <div>
    <h1>API 結果</h1>
    <p>{{ apiResult }}</p>
    <button @click="callApi">API 呼び出し</button>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import axios from 'axios'

const apiResult = ref('')

const callApi = async () => {
  try {
    const response = await axios.get('http://localhost:8080/api/test')
    apiResult.value = response.data.status
  } catch (error) {
    apiResult.value = 'Error'
  }
}
</script>
