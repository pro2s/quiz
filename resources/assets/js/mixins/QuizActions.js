import axios from 'axios';
import Confirm from '../components/Confirm.vue';
import { create } from 'vue-modal-dialogs';
import resorces from '../api/resorces';
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
    computed: {
        activeClass: function () {
            return {
                'btn-success': this.isActive,
                'btn-secondary': !this.isActive
            }
        }
    },
    methods: {
        _toggleQuiz(url) {
            resorces.toggleItem(url).then(_ => this.toggle()).catch(_ => this.error());
        },
        _deleteQuiz(url) {
            confirm('Alert', 'Are you soure?', 'Delete').then(result => result && this.doDelete(url));
        },
        doDelete(url) {
            resorces.deleteItem(url).then(_ => this.hide()).catch(_ => this.error());
        },
        error() {
            this.$notify({group: 'error', type: 'error', title:'Error', text: 'Something went wrong, please try again later'})
        },
        hide() {
            this.show = false;
        },
        toggle() {
            this.isActive = !this.isActive;
        }
    }   
}