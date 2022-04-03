import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/Home.vue";

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: "/complete",
    name: "Complete",
    //NOTE ブラウザからアクセスされたときに読み込み。 HOME以外はこうしておくがよさそう
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/Complete.vue"),
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
