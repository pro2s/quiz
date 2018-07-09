<template>
    <b-col>    
        <b-list-group>
            <b-list-group-item v-for="(item, index) in clicks" :key="index">{{ item }}</b-list-group-item>
        </b-list-group>
    </b-col>
</template>
<script>
import { mapGetters } from 'vuex'
export default {
  computed: mapGetters([
    'clicks'
  ]),
}
</script>