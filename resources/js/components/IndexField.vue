<template>
    <span class="whitespace-no-wrap">{{ field.value }}</span>
</template>

<script>
    export default {
        props: ['resourceName', 'field'],
        mounted() {
            console.log(123);
        }
    }
</script>
