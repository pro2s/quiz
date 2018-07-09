<template>
    <b-col>
        <h3>Count: {{ $store.state.count }} times is {{ evenOrOdd }}.</h3>
    
        <b-button variant="success" @click="increment">+</b-button>
        <b-button variant="danger" @click="decrement">-</b-button>
        <b-button  @click="incrementIfOdd">Increment if odd</b-button>
        <b-button  @click="incrementAsync">Increment async</b-button>
    </b-col>
</template>
<script>
import { mapGetters, mapActions } from 'vuex'
export default {
  computed: mapGetters([
    'evenOrOdd'
  ]),
  methods: mapActions([
    'increment',
    'decrement',
    'incrementIfOdd',
    'incrementAsync'
  ])
}
</script>