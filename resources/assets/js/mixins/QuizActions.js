import axios from 'axios';

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
            axios.put(url).then(_ => this.toggle()).catch(_ => this.error());
        },
        _deleteQuiz(url) {
            this.$dialog.confirm("Some confirmation message")
                .then(_ => this.doDelete(url))
                .catch(_ => {});
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