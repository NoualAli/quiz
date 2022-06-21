<template>
    <div>
        <div class="field">
            <label for="participent" class="label is-size-5 has-text-white">Nom complet</label>
            <div class="control">
                <input type="text" id="participent" class="input is-medium" placeholder="Nom complet"
                    ref="participent_input" autofocus>
            </div>
            <p class="help is-danger is-size-5" v-if="isEmptyName">
                Veuillez saisir votre nom s'il vous plaît
            </p>
        </div>
        <div class="field">
            <div class="control">
                <button class="button is-light is-outlined is-medium" @click="registerParticipent()">Soumettre</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Registration',
    data() {
        return {
            isEmptyName: false
        }
    },
    methods: {
        registerParticipent() {
            let participent = this.$refs.participent_input.value
            if (participent !== '' && participent !== undefined) {
                this.emitRegistration()
            } else {
                this.isEmptyName = true
            }
        },
        emitRegistration() {
            this.$emit('register', this.$refs.participent_input.value)
            this.isEmptyName = false
        }
    }
}
</script>

<style>
</style>
