<template>
  <div class="register">
    <h2>新規登録</h2>
    <form @submit.prevent="submitForm">
      <div>
        <label for="name">名前:</label>
        <input type="text" id="name" v-model="form.name" required />
      </div>

      <div>
        <label for="email">メールアドレス:</label>
        <input type="email" id="email" v-model="form.email" required />
      </div>

      <div>
        <label for="password">パスワード:</label>
        <input type="password" id="password" v-model="form.password" required />
      </div>

      <button type="submit">登録</button>
    </form>

    <div v-if="message">{{ message }}</div>
  </div>
</template>

<script setup>
import { reactive, ref } from 'vue';
import axios from 'axios';

const form = reactive({
  name: '',
  email: '',
  password: ''
});

const message = ref('');

const submitForm = async () => {
  try {
    const response = await axios.post('http://localhost:8080/api/users', form);
    message.value = '登録成功！';
    console.log(response.data);
  } catch (error) {
    console.log(err.response.data);
    message.value = '登録に失敗しました';
    console.error(error);
  }
};
</script>

<style scoped>
.register {
  max-width: 400px;
  margin: 2rem auto;
  padding: 1rem;
  border: 1px solid #ccc;
  border-radius: 8px;
}
.register div {
  margin-bottom: 1rem;
}
</style>
