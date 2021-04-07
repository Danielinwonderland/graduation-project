<template>
  <div>
    <div v-if="currentUser!==undefined">
      <h4>Добавить комментарий</h4>
      <form action="" @submit.prevent="edit ? editComment(comment.id) : createComment()">
        <div class="input-group mb-3">
          <textarea name="body" v-model="comment.body" ref="textarea"  class="form-control"></textarea>
        </div>
        <input type='hidden' v-model="comment.user_id" name="user_id">
        <div class="mb-3">
          <button type="submit" class="btn btn-primary" v-show="!edit">Добавить комментарий</button>
          <button type="submit" class="btn btn-primary" v-show="edit">Изменить комментарий</button>
        </div>
      </form>
    </div>
    <h4>Комментарии</h4>
    <ul class="list-group">
      <li class="list-group-item" v-for="comment in comments">
        {{comment.body}}
        [{{comment.creator_id}}]
        <span v-if="(currentUser !== undefined && currentUser === comment.creator_id)">
          <a class="btn btn-default" v-on:click="showComment(comment.id)">Редактировать</a>
          <a class="btn btn-danger" v-on:click="deleteComment(comment.id)">Удалить</a>
        </span>
      </li>
    </ul>
    <ul v-if="errors && errors.length" class="alert alert-danger">
      <li v-for="error of errors">
        {{error.message}}
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "comments",
  props: ['currentId','currentUser'],

  data: () => ({
    edit: false,
    comments:[],
    comment: {
      id: '',
      title: '',
      body: '',
      user_id: '',
    },
    errors: []
  }),

  mounted: function(){
    this.fetchComments();
  },

  methods: {
    fetchComments: function(){
      axios.get("/api/post/" + this.currentId + "/comments")
          .then(response => {
            this.comments = response.data;
            this.user_id = this.currentUser;
          })
          .catch(error => {
            this.errors.push(error);
          });
    },

    createComment: function(){
      this.comment.user_id = this.user_id;
      axios.post("/api/post/" + this.currentId + "/comment", this.comment)
          .then(response => {
            this.comment.body = '';
            this.fetchComments();
          }).catch(error => {
            this.errors.push(error);
            this.comment.body = '';
          });
    },

    editComment: function(comment_id){
      axios.patch("/api/post/" + this.currentId + "/comment/" + comment_id, this.comment)
          .then( response => {
            this.comment.body= '';
            this.comment.id= '';
            this.fetchComments();
            this.edit = false;
          }).catch(error => {
            this.errors.push(error);
            this.comment.body= '';
            this.comment.id= '';
            this.edit = false;
          });
    },

    deleteComment: function(comment_id){
      axios.delete("/api/post/" + this.currentId + "/comment/" + comment_id)
          .then( function (response){
            this.comment.body= '';
            this.fetchComments();
          }.bind(this));
    },

    showComment: function(comment_id){
      for (var i = 0; i < this.comments.length; i++) {
        if (this.comments[i].id === comment_id) {
          this.comment.body = this.comments[i].body;
          this.comment.id = this.comments[i].id;
          this.edit = true;
        }
      }
    }
  }
}
</script>