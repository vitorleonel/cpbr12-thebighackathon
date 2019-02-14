<template>
  <form action="post" method="post" @submit.prevent="submitHandler">
    <div class="form-group">
      <label for="type_id">Você é aluno, professor ou uma pessoa externa?</label>

      <select
        name="type_id"
        id="type_id"
        class="form-control form-control-lg"
        v-model="form.type_id"
        required
        autofocus
      >
        <option :value="type.id" v-for="type in data.types" :key="type.id">{{ type.name }}</option>
      </select>
    </div>

    <div class="form-group">
      <label for="state_id">Em qual estado você mora?</label>

      <select
        name="state_id"
        id="state_id"
        class="form-control form-control-lg"
        v-model="form.state_id"
        required
      >
        <option :value="state.id" v-for="state in data.states" :key="state.id">{{ state.name }}</option>
      </select>
    </div>

    <div class="form-group">
      <label for="city_id">Em qual cidade você mora?</label>

      <select
        name="city_id"
        id="city_id"
        class="form-control form-control-lg"
        v-model="form.city_id"
        required
      >
        <option :value="city.id" v-for="city in data.cities" :key="city.id">{{ city.name }}</option>
      </select>
    </div>

    <div class="form-group">
      <label for="name">Qual seu nome completo?</label>

      <input
        type="text"
        name="name"
        id="name"
        class="form-control form-control-lg"
        v-model="form.name"
        required
      >
    </div>

    <div class="form-group">
      <label for="school_name">Qual o nome da escola?</label>

      <input
        type="text"
        name="school_name"
        id="school_name"
        class="form-control form-control-lg"
        v-model="form.school_name"
        required
      >
    </div>

    <div class="form-group">
      <label for="reason">Por que você esta denunciando?</label>

      <textarea
        name="reason"
        id="reason"
        rows="6"
        class="form-control form-control-lg"
        v-model="form.reason"
        required
      ></textarea>
    </div>

    <div class="form-group">
      <button
        class="btn btn-block btn-lg btn-primary"
        :disabled="loading"
      >{{ loading ? 'Aguarde...' : 'Denunciar' }}</button>
    </div>
  </form>
</template>


<style lang="scss" scoped>
form {
  padding: 1.5rem 0;
}
</style>

<script>
export default {
  data() {
    return {
      loading: false,
      errors: [],

      data: {
        types: [],
        states: [],
        cities: []
      },

      form: {
        type_id: "",
        state_id: "",
        city_id: "",
        name: "",
        school_name: "",
        reason: ""
      }
    };
  },

  async mounted() {
    this.getData();
  },

  methods: {
    async getData() {
      try {
        const { data } = await axios.get("/api/complaints");

        this.data = { ...data };
      } catch ({ response }) {}
    },

    async submitHandler() {
      this.loading = true;

      try {
        await axios.post("/api/complaints", this.form);

        this.resetForm();
      } catch ({ response }) {}

      this.loading = false;
    },

    resetForm() {
      this.form = {
        type_id: "",
        state_id: "",
        city_id: "",
        name: "",
        school_name: "",
        reason: ""
      };
    }
  }
};
</script>

