<template>
    <base-modal @click.native="$close(false)">
        <div class="modal-header">
        <h5 class="modal-title">{{ title }}</h5>
            <button type="button" class="close" @click="$close(false)">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>{{ content }}</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" @click="$close(false)">Close</button>
        </div>
    </base-modal>
</template>
<script>
import BaseModal from "@/components/modals/BaseModal.vue";
export default {
    components: {
        BaseModal
    }
};
</script>
