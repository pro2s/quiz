import Confirm from '@/components/dashboard/Confirm.vue';
import { create } from 'vue-modal-dialogs';
import resorces from '@/api/resources';

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
            resorces.toggleItem(url).then(_ => this.toggle()).catch(_ => this.error());
        },
        _deleteItem(url, item) {
            confirm('Alert', 'Are you soure?', 'Delete').then(result => result && this.doDelete(url, item));
        },
        doDelete(url, item) {
            resorces.deleteItem(url).then(_ => this.hide(item)).catch(_ => this.error());
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