<template>
    <div class="container" :class="{ 'is-flex is-justify-content-center is-align-items-center': !isStarted }">
        <div class="notification is-danger" v-if="error">
            {{ error }}
        </div>
        <div class="box" id="quiz-box" v-if="isStarted">
            <!-- Quiz Title -->
            <QuizHeader :title="title" v-if="participent == ''"></QuizHeader>

            <!-- Quiz Inscription -->
            <Registration v-if="participent == ''" @register="registerParticipent" @error="displayError"
                @clearError="clearError" />

            <!-- Quiz Questions -->
            <Questions :data="questions" v-else />
        </div>
        <button class="button is-primary is-large is-outlined" @click="startQuiz" v-else>Commencer</button>
    </div>
</template>

<script>
import Registration from './Registration'
import QuizHeader from './QuizHeader'
import Questions from './Questions'
export default {
    components: {
        Registration,
        QuizHeader, Questions
    },
    name: 'quiz',
    data() {
        return {
            title: "Quiz",
            participent: '',
            isStarted: false,
            error: '',
            questions: [
                {
                    id: 1,
                    title: 'L’approbation de l’acétate de Glatiramére (Glathera) dans le traitement des formes rémittentes de la SEP était en :',
                    answers: [
                        {
                            title: '1993',
                            isTrue: false
                        },
                        {
                            title: '1996',
                            isTrue: true
                        },
                        {
                            title: '1998',
                            isTrue: false
                        },
                    ]
                },
                {
                    id: 2,
                    title: 'Glathera est un :',
                    answers: [
                        {
                            title: 'Immunomodulateur',
                            isTrue: true
                        },
                        {
                            title: 'Immunosuppresseur',
                            isTrue: false
                        },
                        {
                            title: 'Anticorps monoclonal',
                            isTrue: false
                        },
                    ]
                },
                {
                    id: 3,
                    title: 'Glathera est un complexe immuno-actif de polypeptides synthétisé composé de :',
                    answers: [
                        {
                            title: '2 acides aminés naturels',
                            isTrue: false
                        },
                        {
                            title: '4 acides aminés naturels ',
                            isTrue: true
                        },
                        {
                            title: '6 acides aminés naturels.',
                            isTrue: false
                        },
                    ]
                },
                {
                    id: 4,
                    title: 'La fatigue est un symptôme rapporté par environ 3/4 des patients souffrant de la SEP ',
                    answers: [
                        {
                            title: 'Vrai',
                            isTrue: true
                        },
                        {
                            title: 'Faux',
                            isTrue: false
                        },
                    ]
                },
                {
                    id: 5,
                    title: 'Glathera réduit la fatigue d’environ :',
                    answers: [
                        {
                            title: '1/3 après le début de traitement',
                            isTrue: false
                        },
                        {
                            title: '1/4 après le début de traitement',
                            isTrue: true
                        },
                        {
                            title: '1/5 après le début de traitement',
                            isTrue: false
                        },
                    ]
                },
                {
                    id: 6,
                    title: 'L’effet indésirable le plus fréquent avec Glathera est :',
                    answers: [
                        {
                            title: 'Douleur au site d’injection',
                            isTrue: false
                        },
                        {
                            title: 'Erythème au site d’injection',
                            isTrue: true
                        },
                        {
                            title: 'Œdème au site d’injection',
                            isTrue: false
                        },
                    ]
                },
                {
                    id: 7,
                    title: 'Glathera est contre indiqué en cas de dépression :',
                    answers: [
                        {
                            title: 'Vrai',
                            isTrue: false
                        },
                        {
                            title: 'Faux',
                            isTrue: true
                        },
                    ]
                },
                {
                    id: 8,
                    title: 'Une surveillance particulière clinique et biologique est préconisé avec Glathera :',
                    answers: [
                        {
                            title: 'Vrai',
                            isTrue: false
                        },
                        {
                            title: 'Faux',
                            isTrue: true
                        },
                    ]
                },
                {
                    id: 9,
                    title: 'Le syndrome pseudo-grippal est un effet indésirable fréquent du traitement par Glathera :',
                    answers: [
                        {
                            title: 'Vrai',
                            isTrue: false
                        },
                        {
                            title: 'Faux',
                            isTrue: true
                        },
                    ]
                },
                {
                    id: 10,
                    title: 'L’utilisation de Glathera est possible quel que soit le terme de la grossesse :',
                    answers: [
                        {
                            title: 'Vrai',
                            isTrue: true
                        },
                        {
                            title: 'Faux',
                            isTrue: false
                        },
                    ]
                },
            ]
        }
    },
    methods: {
        startQuiz() {
            this.isStarted = true
        },
        registerParticipent(value) {
            this.participent = value
        },
        displayError(error) {
            this.error = error
        },
        clearError() {
            this.error = ''
        }
    }
}
</script>

<style>
</style>
