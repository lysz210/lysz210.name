<template>
<v-container
    id="scroll-target"
    class="scroll"
>
    <v-layout>
        <iframe
            v-scroll:#scroll-target="onScroll"
            ref="externalWindow"
            :height="`${height}px`"
            :src="src" frameborder="0"
            style="width: 100%"
            @load="update"
            scrolling="no"
        ></iframe>
    </v-layout>
</v-container>
</template>

<script>
export default {
    props: {
        src: {
            type: String,
            default: '/cv'
        }
    },
    data () {
        return {
            height: 150
        }
    },
    methods: {
        update: function (event) {
            this.height = this.$refs.externalWindow.contentDocument.body.offsetHeight
        }
    }
}
</script>
