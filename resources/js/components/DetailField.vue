<template>
    <div class="flex border-b border-40">
        <div class="w-1/4 py-4">
            <slot>
                <h4 class="font-normal text-80">
                    {{ field.name }}
                </h4>
            </slot>
        </div>
        <div class="w-3/4 py-4">
            <slot name="value">
                <div v-if="field.value !== 'null'" class="text-90">
                    <ul :class="field.options.listClass" v-if="field.value && isObject(field.value)">
                        <li v-for="(value, key) in field.value" class="pb-2">
                            <strong>{{key}}:</strong>
                            <span>{{value}}</span>
                        </li>
                    </ul>
                </div>
                <div v-else>&mdash;</div>
            </slot>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['resource', 'resourceName', 'resourceId', 'field'],
        methods: {
            isObject(value) {
                return typeof value === 'object' && value !== null;
            }
        }
    }
</script>
