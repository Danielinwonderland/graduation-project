<template>
  <div class="container">
    <form>
      <div class="input-group mb-3">
        <input type="text" placeholder="Поиск..." name="query" class="form-control" v-model="query">
        <button class="btn btn-outline-primary" type="button" v-on:click="search()" v-if="!loading">Найти</button>
        <button class="btn btn-outline-primary" type="button" disabled="disabled" v-if="loading">Поиск...</button>
      </div>
    </form>

    <div class="alert alert-danger alert-dismissible fade show" role="alert" v-if="error">
      {{ error }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="row" v-if="articles.length">
      <div class="col" v-for="article in articles">
        <div class="card" style="width: 18rem;">
          <img :src="'/upload/' + article.image" :alt="article.title" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">{{ article.title }}</h5>
            <p class="card-text">{{ article.summary | truncate }}</p>
            <a class="btn btn-primary" :href="'/articles/' + article.slug">Читать</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  data: () => ({
    articles: [],
    loading: false,
    error: false,
    query: ''
  }),

  filters: {
    truncate: function truncate(value) {
      var length = 20;
      if(value.length <= length) {
        return value;
      }
      else {
        return value.substring(0, length) + '...';
      }
    }
  },

  methods: {
    search: function() {
      // Clear the error message.
      this.error = '';
      // Empty the articles array so we can fill it with the new articles.
      this.articles = [];
      // Set the loading property to true, this will display the "Searching..." button.
      this.loading = true;

      // Making a get request to our API and passing the query to it.

      // this.query = 'cumque';
      axios.get('/api/search?q=' + this.query).then((response) => {
        // If there was an error set the error message, if not fill the articles array.
        //response.error ? this.error = response.error : this.articles = response;
        this.articles = response.data;
        // The request is finished, change the loading to false again.
        this.loading = false;
        // Clear the query.
        this.query = '';
      });
    }
  }

}
</script>
