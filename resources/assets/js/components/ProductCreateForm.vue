<template>

    <div>
        <h1>works</h1>
        <div class="form-group">
            <label>Название товара: </label>
            <input type="text" class="form-control" name="name" value="" placeholder="Введите название товара">

        </div>
        <div class="form-group">
        <label>Категория: </label>
            <select name="category" class="form-control" v-on:change="getAttributes" v-model="selectedCatetory">
                <option value="" disabled>выберите категорию</option>
                <option v-for="(category, index) in categories" :value="category.id">
                {{ category.name }}
                </option>
            </select>
        </div>
        <div class="form-group">
            <label>Цена: </label>
            <input type="text" class="form-control" name="price" value="" placeholder="Введите цену">
        </div>
        <div class="form-group">
            <label>описание: </label>
            <textarea name="description" class="form-control" placeholder="введите описание"></textarea>
        </div>
        <div class="form-group">
            <h4>Добавление атрибутов</h4>
        </div>
        <div class="form-group" v-for="(catAttribute, index) in catAttributes">
            <label v-text="catAttribute.name"></label>
            <!--<select multiple :name="catAttribute.id" class="form-control">-->
                <!--<option :value="option.id" v-for="(option, index) in catAttribute.options" v-html="option.value"></option>-->
            <!--</select>-->
            <div v-for="(option, index) in catAttribute.options"><label v-text="option.value"></label> <input type="checkbox" :name="getAttrId(catAttribute.id)" :value="option.id"></div>

        </div>
        <div class="form-group">
            <label>выберите изображение</label>
            <input type="file" class="filestyle" name="image">
            </div>
        <div class="form-group">
        <button type="submit" class="btn btn-primary">сохранить</button>
        </div>
    </div>

</template>

<script>
    export default {
        props: ['attributes'],

        data(){
            return {
                description: '',
                categories: this.attributes,
                selectedCatetory: '',
                catAttributes: [],
                selectedAttributes: [],
                value: ''
            };
        },

        methods: {

            getAttrId: function(name) {
                return name + '[]';
            },

            getAttributes(){

                axios.get('/admin/categories/'+ this.selectedCatetory +'/attributes').then(({ data }) => {
                    this.catAttributes = data;
                    console.log(this.catAttributes)
                });
                console.log('works');
            },

        }
    }
</script>