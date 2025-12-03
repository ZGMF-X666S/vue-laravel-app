import axios from 'axios'
import type { Item } from '@/types/item'

const BASE_URL = 'http://localhost:8080/api'

export const fetchItems = async (): Promise<Item[]> => {
  const response = await axios.get(`${BASE_URL}/items`)
  return response.data
}
