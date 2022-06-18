<template>
    <div>
        <div class="has-text-white">
            <QuizHeader :title="getActiveQuestion().title" titleSize="4" :show-indicator="true"
                :totalQuestions="totalQuestions()" :activeQuestion="activeQuestion" />

            <div class="columns is-multiline">
                <div class="column is-6" v-for="answer in getActiveQuestion().answers" :key="answer.title">
                    <button class="button is-light is-outlined is-medium is-fullwidth" :disabled="answerd"
                        @click.prevent="checkAnswer(getActiveQuestion().answers.indexOf(answer))">
                        {{ answer.title }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import QuizHeader from './QuizHeader'
export default {
    components: { QuizHeader },
    name: 'questions',
    props: ['data'],
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
            this.answered = true;
            this.answers.push(answer + 1);
            this.showNextQuestion()
            console.log(answer, this.answers);
        },
        totalQuestions() {
            return this.$props.data.length
        },
        getActiveQuestion() {
            return this.$props.data[this.activeQuestion - 1]
        },
        showNextQuestion() {
            if (this.activeQuestion < 10) {
                this.answered = false;
                this.activeQuestion = this.activeQuestion + 1;
            } else {
                this.showResults();
            }
        },
        showResults() {
            this.results = true;
            axios.post('/api/store', {
                name: this.name,
                answers: this.answers
            })
                .then(() => {

                })
        },
        endQuiz() {
            location.reload();
        }
    }
}
</script>

<style>
</style>
