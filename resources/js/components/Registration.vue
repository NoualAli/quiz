<template>
    <form @submit.prevent>
        <input type="hidden" name="_token" :value="csrf">
        <div class="field">
            <label for="full_name" class="label is-size-5 has-text-white">Nom complet</label>
            <div class="control">
                <input type="text" id="full_name" class="input is-medium" placeholder="Nom complet" ref="full_name"
                    name="full_name" autofocus>
            </div>
            <p class="help is-danger is-size-5" v-if="errorMessage">
                {{ errorMessage }}
            </p>
        </div>
        <div class="field">
            <div class="control">
                <button class="button is-light is-outlined is-medium" @click="registerParticipent()">Soumettre</button>
            </div>
        </div>
    </form>
</template>

<script>
import axios from 'axios'

export default {
    name: 'Registration',
    data() {
        return {
            errorMessage: null,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    },
    methods: {
        registerParticipent() {
            const full_name = this.$refs.full_name.value
            axios.post('/api/quiz/validate_participent', { 'full_name': full_name, '_token': this.csrf }).then((response) => {
                this.$emit('clearError', true)
                this.$emit('register', this.$refs.full_name.value)
            }).catch((error) => {
                this.$emit('error', error.response.data.message)
            })
        },
    }
}
</script>

<style>
</style>
