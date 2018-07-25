import axios from 'axios';
import Confirm from '../components/Confirm.vue';
import { create } from 'vue-modal-dialogs';

const confirm = create(Confirm, 'title', 'content', 'action');

export default {
    data: function () {
        return {
            show: true,
            isActive: this.active
        }
    },
    props: {
        active: {
            type: Boolean,
            default: false
        }
    },
    methods: {
        _toggleItem(url) {
            axios.put(url).then(_ => this.toggle()).catch(_ => this.error());
        },
        _deleteItem(url) {
            confirm('Alert', 'Are you soure?', 'Delete').then(result => result && this.doDelete(url));
        },
        doDelete(url) {
            axios.delete(url).then(_ => this.hide()).catch(_ => this.error());
        },
        error() {
            console.log('error');
        },
        hide() {
            this.show = false;
        },
        toggle() {
            this.isActive = !this.isActive;
        }
    }   
}