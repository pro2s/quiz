import axios from 'axios';
export default {
    deleteItem(url) {
        return axios.delete(url);
    },
    toggleItem(url) {
        return axios.put(url);
    }
}