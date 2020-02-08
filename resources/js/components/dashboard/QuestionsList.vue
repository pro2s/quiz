<template>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <add-question :search-url="search">
                <template slot-scope="{selected}" slot="selected">
                    <div class="mt-2">
                        {{selected.title}}
                        <button class="btn btn-success mr-2 float-right" @click="addQuestion(selected)">
                            <plus-icon/>
                        </button>    
                    </div>
                </template>
            </add-question>
        </li>
        <li class="list-group-item" v-for="question in list" :key="question.slug" :class="{ disabled: !question.active }">
            {{ question.title }}
            <button class="btn btn-outline-danger mr-2 float-right" @click="deleteQuestion(question)">
                <minus-icon/>
            </button>    
        </li>
    </ul>
</template>
<script>
import { MinusIcon, PlusIcon } from 'vue-feather-icons'
import ItemActions from '@/mixins/ItemActions.js'
import AddQuestion from '@/components/dashboard/AddQuestion.vue'
import Alert from '@/components/dashboard/Alert.vue';
import { create } from 'vue-modal-dialogs';

const alert = create(Alert, 'title', 'content');

export default {
    components: {
        AddQuestion,
        MinusIcon,
        PlusIcon
    },
    mixins: [ItemActions],
    props: {
        questions: {
            type: Array,
            required: true
        }, 
        search: {
            type: String,
            required: true
        },
        delete: {
            type: String,
            required: true
        },
        add: {
            type: String,
            required: true
        },
    },
    data() {
        return {
            list: this.questions
        }
    },
    methods: {
        addQuestion(question) {
            if (this.list.filter(q => q.id === question.id).length) {
                alert('Alert', 'Item already added');
            } else {
                this.list.push(question);
            }
        },
        deleteQuestion(question) {
            this._deleteItem(this.delete + '/' + question.id, question);
        },
        hide(question) {
            this.list = this.list.filter(q => q.id !== question.id)
        }
    }
}
</script>
