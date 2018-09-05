<template>
    <default-field :field="field">
        <template slot="field">
            <div v-for="(property, key) in properties" class="flex border-b border-40">
                <div class="w-1/3 px-8 py-6">
                    <template v-if="property.description">
                        <label :for="key" class="inline-block text-80 h-9">{{ property.description }}</label>
                        <help-text>{{ key }}</help-text>
                    </template>
                    <template v-else>
                        <label :for="key" class="inline-block text-80 h-9">{{ key }}</label>
                    </template>
                </div>

                <div class="w-1/2 px-8 py-6">
                    <input :id="key" type="text"
                           class="w-full form-control form-input form-input-bordered"
                           :class="fieldHasError(key) ? 'border-danger': ''"
                           :value="getValue(key)"
                           @input="(event) => setValue(key, event.target.value)"/>
                    <p v-if="fieldHasError(key)" class="my-2 text-danger">
                        {{ getError(key) }}
                    </p>
                </div>
            </div>
        </template>
    </default-field>
</template>

<script>
    import {FormField, HandlesValidationErrors} from 'laravel-nova'

    export default {
        mixins: [FormField, HandlesValidationErrors],
        props: ['resourceName', 'resourceId', 'field'],
        methods: {
            setInitialValue() {
                this.value = JSON.parse(this.field.value) || {}
            },
            fill(formData) {
                this.errors.clear();
                formData.append(this.field.attribute, JSON.stringify(this.value) || '');
            },
            setValue(key, value) {
                this.value[key] = value;
            },
            getValue(key) {
                return this.value[key];
            },
            fieldHasError(key) {
                return this.errors.has(`${this.fieldAttribute}.${key}`);
            },
            getError(key) {
                return this.errors.first(`${this.fieldAttribute}.${key}`);
            }
        },
        computed: {
            parsed() {
                return JSON.parse(this.field.value)
            },
            properties() {
                return this.field.options.schema.properties;
            }
        },
    }
</script>