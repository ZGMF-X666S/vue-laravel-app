<template>
  <div class="p-4">
    <h1 class="text-2xl font-bold mb-4">アイテム一覧</h1>

    <button @click="load" class="px-4 py-2 bg-blue-500 text-white rounded">
      データ取得
    </button>

    <ul class="mt-4">
      <li v-for="item in items" :key="item.id" class="border-b py-2">
        {{ item.name }}
      </li>
    </ul>

    <p v-if="error" class="text-red-500 mt-2">
      {{ error }}
    </p>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import type { Item } from '@/types/item'
import { fetchItems } from '@/api/itemApi'

const items = ref<Item[]>([])
const error = ref('')

const load = async () => {
  try {
    items.value = await fetchItems()
    error.value = ''
  } catch (e) {
    console.error(e)
    error.value = 'データ取得に失敗しました'
  }
}
</script>
