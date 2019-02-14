import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import ComplaintPage from "./pages/Complaint/Complaint";

const routes = [
  {
    name: "app.complaint.index",
    path: "/",
    component: ComplaintPage
  }
];

const router = new VueRouter({
  mode: "history",
  routes
});

export default router;
