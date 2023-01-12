<template>
    <div class="container d-flex flex-column justify-content-center text-center mt-3">
        <h1 class="title">Привіт!</h1>
        <h4 class="sub-title">Це менеджер проектів. Тут ти зможеш вирубити проект, по якому клієнт не заплатив мані. =)</h4>
        <hr class="mb-3 mt-3" />
        <input type="text" class="form-control text-center" placeholder="Пошук..." aria-label="Пошук..." aria-describedby="button-addon2"
            v-model="search_text" @input="filter">
        <table class="table" v-if="projects">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Назва</th>
                    <th scope="col">Посилання</th>
                    <th scope="col">Статус</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, key) in projects" :key="key" :class="!item.is_view ? 'd-none' : ''">
                    <th scope="row">{{ item.id }}</th>
                    <td>{{ item.name }}</td>
                    <td><a :href="item.url" target="_blank">{{ item.url }}</a></td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" v-model="item.is_active" type="checkbox" role="switch" @click="setProject(item)">
                            <label class="form-check-label p-1 rounded-2 status-lable" :class="item.is_active ? 'text-bg-success' : 'text-bg-danger'">{{ item.is_active ? 'Активний' : 'Неавтивний' }}</label>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="mobile-table">
            <div class="mobile-table__item" v-for="(item, key) in projects" :key="key" :class="!item.is_view ? 'd-none' : ''">
                <div class="mobile-table__row">
                    <span class="mobile-table__column_name">ID: </span>
                    <span class="mobile-table__column_value">{{ item.id }}</span>
                </div>
                <div class="mobile-table__row">
                    <span class="mobile-table__column_name">Назва: </span>
                    <span class="mobile-table__column_value">{{ item.name }}</span>
                </div>
                <div class="mobile-table__row">
                    <span class="mobile-table__column_name">Посилання: </span>
                    <span class="mobile-table__column_value"><a :href="item.url" target="_blank">{{ item.url }}</a></span>
                </div>
                <div class="mobile-table__row">
                    <span class="mobile-table__column_name">Статус: </span>
                    <span class="mobile-table__column_value">
                        <div class="form-check form-switch status-mobile">
                            <input class="form-check-input status-mobile" v-model="item.is_active" type="checkbox" role="switch" @click="setProject(item)">
                            <label class="form-check-label p-1 rounded-2 status-lable" :class="item.is_active ? 'text-bg-success' : 'text-bg-danger'">{{ item.is_active ? 'Активний' : 'Неавтивний' }}</label>
                        </div>
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    methods: {
        async search() {
            let data = null;
            await axios.get('/search').then(response => (data = response.data));
            this.projects = data;
        },
        filter() {
            for (var key in this.projects) {
                this.projects[key].is_view = this.projects[key].name.toLowerCase().indexOf(this.search_text.toLowerCase()) != -1 || this.projects[key].url.toLowerCase().indexOf(this.search_text.toLowerCase()) != -1 ? true : false;
            }
        },
        async setProject(project) {
            await axios.post('/set-project', {
                id: project.id,
                value: !project.is_active
            });
        }
    },
    mounted() {
        this.search();
    },
    data() {
        return {
            search_text: '',
            projects: null
        }
    }
}
</script>
<style>
    
</style>