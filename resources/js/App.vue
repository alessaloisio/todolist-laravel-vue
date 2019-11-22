<template>
    <div id="app">
        <router-view name="header" />
        <fade-transition origin="center" mode="out-in" :duration="250">
            <router-view />
        </fade-transition>
        <router-view name="footer" />
    </div>
</template>
<script>
import { FadeTransition } from "vue2-transitions";

export default {
    components: {
        FadeTransition
    }
};
</script>
