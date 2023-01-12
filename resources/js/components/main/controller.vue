<template>
    <div class="container d-flex flex-column justify-content-center text-center">
        <h1 class="title">Привіт!</h1>
        <h4 class="sub-title">Це менеджер проектів. Тут ти зможеш вирубити проект, по якому клієнт не заплатив мані. =)</h4>
        <hr class="mb-3 mt-3" />
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Пошук..." aria-label="Пошук..."
                aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Знайти</button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Назва</th>
                    <th scope="col">Посилання</th>
                    <th scope="col">Статус</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Capital HLD</td>
                    <td><a href="https://www.capital-hld.com">https://www.capital-hld.com</a></td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                            <label class="form-check-label text-bg-danger p-1 rounded-2 status-lable"
                                for="flexSwitchCheckChecked">Неактивний</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>E-STOKEN</td>
                    <td><a href="https://stoken.site">https://stoken.site</a></td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"
                                checked>
                            <label class="form-check-label text-bg-success p-1 rounded-2 status-lable"
                                for="flexSwitchCheckChecked">Активний</label>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="mobile-table">
            <div class="mobile-table__item">
                <div class="mobile-table__row">
                    <span class="mobile-table__column_name">ID: </span>
                    <span class="mobile-table__column_value">1</span>
                </div>
                <div class="mobile-table__row">
                    <span class="mobile-table__column_name">Назва: </span>
                    <span class="mobile-table__column_value">Capital HLD</span>
                </div>
                <div class="mobile-table__row">
                    <span class="mobile-table__column_name">Посилання: </span>
                    <span class="mobile-table__column_value"><a
                            href="https://www.capital-hld.com">https://www.capital-hld.com</a></span>
                </div>
                <div class="mobile-table__row">
                    <span class="mobile-table__column_name">Статус: </span>
                    <span class="mobile-table__column_value">
                        <div class="form-check form-switch status-mobile">
                            <input class="form-check-input mobile-swith" type="checkbox" role="switch"
                                id="flexSwitchCheckChecked">
                            <label class="form-check-label text-bg-danger p-1 rounded-2 status-lable"
                                for="flexSwitchCheckChecked">Неактивний</label>
                        </div>
                    </span>
                </div>
            </div>
            <div class="mobile-table__item">
                <div class="mobile-table__row">
                    <span class="mobile-table__column_name">ID: </span>
                    <span class="mobile-table__column_value">2</span>
                </div>
                <div class="mobile-table__row">
                    <span class="mobile-table__column_name">Назва: </span>
                    <span class="mobile-table__column_value">E-STOKEN</span>
                </div>
                <div class="mobile-table__row">
                    <span class="mobile-table__column_name">Посилання: </span>
                    <span class="mobile-table__column_value"><a href="https://stoken.site">https://stoken.site</a></span>
                </div>
                <div class="mobile-table__row">
                    <span class="mobile-table__column_name">Статус: </span>
                    <span class="mobile-table__column_value">
                        <div class="form-check form-switch status-mobile">
                            <input class="form-check-input mobile-swith" type="checkbox" role="switch"
                                id="flexSwitchCheckChecked" checked>
                            <label class="form-check-label text-bg-success p-1 rounded-2 status-lable"
                                for="flexSwitchCheckChecked">Активний</label>
                        </div>
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    
}
</script>
<style>
    
</style>