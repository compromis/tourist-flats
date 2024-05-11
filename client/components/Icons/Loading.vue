<template>
  <Icon name="lucide:loader-circle" class="icon-loading" />
</template>

<style lang="scss" scoped>
.icon-loading {
  animation: spin 1s linear infinite;
}

@keyframes spin {
  from {
    rotate: 0;
  }

  to {
    rotate: 360deg;
  }
}
</style>