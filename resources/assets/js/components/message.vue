<template>
    <div class="Message__item"><slot></slot></div>
</template>

<script>
    export default {
        props: ['level'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
