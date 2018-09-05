Nova.booting((Vue, router) => {
    Vue.component('index-nova-json-schema-field', require('./components/IndexField'));
    Vue.component('detail-nova-json-schema-field', require('./components/DetailField'));
    Vue.component('form-nova-json-schema-field', require('./components/FormField'));
})
