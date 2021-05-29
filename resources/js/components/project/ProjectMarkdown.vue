<template>
    <div id="editor">
    <textarea :value="input" @input="update"></textarea>
    <div v-html="compiledMarkdown"></div>
    </div>
</template>
<script>

new Vue({
    el: "#editor",
    data: {
        input: "# hello"
    },
    computed: {
        compiledMarkdown: function() {
            return marked(this.input, { sanitize: true });
        }
    },
    methods: {
        update: _.debounce(function(e) {
            this.input = e.target.value;
        }, 300)
    }
});
</script>
