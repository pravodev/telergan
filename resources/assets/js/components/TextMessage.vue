<template>
    <div class="TextMessage" :class="type">
        <div class="TextMessage__body">
            <slot></slot>
        </div>
        <div class="TextMessage__name">{{ user }}</div>
    </div>
</template>

<script>
export default {
    props: ["user", "type"],
    mounted() {
        console.log("mounted");
    }
};
</script>

