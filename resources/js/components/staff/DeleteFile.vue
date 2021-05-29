<template>
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <img width="50" src="files/image/icons/passport-card.svg" alt="passport">
            <h5 class="m-0 ms-3">file</h5>
        </div>
        <div class="">
            <button class="btn btn-outline-success">Скачать</button>
            <button class="btn btn-outline-danger ms-2" onclick="fuck()" data-type="passport">Удалить</button>
        </div>
    </div>
</template>

<script>

export default {
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
