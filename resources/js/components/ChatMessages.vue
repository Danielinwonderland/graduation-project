<template>
  <div>
    <div class="card mb-2" v-for="message in messages">
      <div class="card-header">{{ message.user.name }}</div>
      <div class="card-body">
        <blockquote class="blockquote mb-0">
          <p>{{ message.message }}</p>
          <footer class="blockquote-footer">{{ message.created_at | formatDate }}</footer>
        </blockquote>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['messages']
};
</script>
