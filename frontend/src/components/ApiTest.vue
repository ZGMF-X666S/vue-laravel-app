<template>
  <div>
    <h1>API 結果</h1>
    <pre>{{ apiResult }}</pre>
    <button @click="callApi">API 呼び出し</button>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import axios from 'axios'

const apiResult = ref({})

const callApi = async () => {
    try {
        const response = await axios.get('http://localhost:8080/api/test')
        apiResult.value = response.data.status
    } catch (error) {
        console.error(error) // エラー内容を確認
        apiResult.value = 'Error'
    }
}


</script>
