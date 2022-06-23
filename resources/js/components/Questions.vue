<template>
    <div class="columns is-multiline" v-if="!results">
        <div class="column is-12">
            <QuizHeader :title="getActiveQuestion().title" titleSize="4" :show-indicator="true"
                :totalQuestions="totalQuestions()" :activeQuestion="activeQuestion" />
        </div>

        <div class="column is-12">
            <div class="columns is-multiline">
                <div class="column is-6" v-for="answer in getActiveQuestion().answers" :key="answer.title">
                    <button class="button is-light is-outlined is-large is-fullwidth" :disabled="answerd"
                        @click.prevent="checkAnswer(getActiveQuestion().answers.indexOf(answer))">
                        {{ answer.title }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div v-else>
        <QuizResult :answers="answers" :questions="this.getQuestions()" />
    </div>
</template>

<script>
import QuizResult from './QuizResult'
import QuizHeader from './QuizHeader'
export default {
    components: {
        QuizResult, QuizHeader
    },
    name: 'questions',
    props: ['data', 'participent'],
    data() {
        return {
            activeQuestion: 1,
            answerd: false,
            results: false,
            answers: []
        }
    },
    methods: {
        checkAnswer(answer) {
            this.answerd = true;
            this.answers.push(answer + 1);
            this.showNextQuestion()
        },
        totalQuestions() {
            return this.$props.data.length
        },
        getActiveQuestion() {
            return this.getQuestions()[this.activeQuestion - 1]
        },
        getQuestions() {
            return this.$props.data
        },
        showNextQuestion() {
            if (this.activeQuestion < 10) {
                this.answerd = false;
                this.activeQuestion = this.activeQuestion + 1;
            } else {
                this.showResults();
            }
        },
        showResults() {
            this.results = true;
            this.storeResults()
        },
        storeResults() {
            axios.post('/api/quiz/store', {
                full_name: this.$props.participent,
                answers: this.answers
            })
                .then(() => {

                }).catch((error) => {
                    this.$emit('error', error.response.data.message)
                })
        },
    }
}
</script>

<style>
</style>
