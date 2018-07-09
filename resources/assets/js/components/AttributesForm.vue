<script>
    export default {
        props: ['attributes'],

        data(){
            return {
                image: this.attributes
            };
        },

        methods: {
            destroy(){
                axios.delete('/admin/image/' + this.attributes.id);

                $(this.$el).fadeOut(1000);
            },

        }
    }
</script>