<template>
    <header id="quiz-header">
        <div class="columns is-multiline">
            <div class="column" :class="{ 'is-10': indicator }">
                <h1 class="title has-text-white" :class="getTitleSize()">{{ title }}</h1>
            </div>
            <div class="column is-2 has-text-right" v-if="indicator">
                <h1 class="title has-text-white" :class="getTitleSize()">
                    {{ handleIndicator() }}
                </h1>
            </div>
        </div>
        <div class="is-divider"></div>
    </header>
</template>

<script>
export default {
    name: "QuizHeader",
    props: ['title', 'titleSize', 'showIndicator', 'totalQuestions', 'activeQuestion'],
    mounted() {
        this.indicator = this.$props.showIndicator
    },
    data() {
        return {
            indicator: false
        }
    },
    methods: {
        handleIndicator() {
            return this.$props.activeQuestion + ' / ' + this.$props.totalQuestions
        },
        getTitleSize() {
            return 'is-' + this.$props.titleSize
        }
    }
}
</script>

<style>
</style>
