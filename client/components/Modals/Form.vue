<script setup>
  import { VueFinalModal } from 'vue-final-modal'

  defineProps({
    title: String
  })

  const emit = defineEmits(['confirm'])
  </script>

  <template>
    <VueFinalModal
      class="form-modal"
      content-class="form-modal-content"
      overlay-class="form-modal-overlay"
      overlay-transition="vfm-fade"
      content-transition="content"
    >
      <div class="form-modal-card">
        <h2 class="visually-hidden">
          {{ $t('form.title') }}
        </h2>
        <button
          @click="emit('confirm')"
          class="close"
          :aria-label="$t('assist.close')"
        >
          <Icon name="lucide:x" />
        </button>
        <SectionsForm @close="emit('confirm')"/>
      </div>
    </VueFinalModal>
  </template>

<style lang="scss">
.form-modal {
  overflow: auto;
  background-color: rgba($pine, .75);

  &-content {
    padding: var(--site-padding);
    max-width: 800px;
    margin: 0 auto;
    padding-top: calc(var(--site-padding) + 5vh);
    padding-bottom: 20vh;

    &:focus-visible {        
      .form-modal-card {
        outline: 3px var(--orange) solid;
      }
    }
  }

  &-card {
    --border-color: #{mix($pine, $black, 35%)};
    color: var(--pine);
    box-shadow: .5rem .5rem 0 0 var(--border-color);
    border: 4px var(--border-color) solid;
    padding: var(--spacer-8);
    border-radius: 1rem;
    background-color: var(--white);
    position: relative;
  }

  &-overlay {
    position: fixed;
    background-color: transparent;
  }
}

.close {
  appearance: none;
  position: absolute;
  top: var(--site-padding);
  right: var(--site-padding);
  font-size: 2rem;
  background: transparent;
  appearance: none;
  border-radius: .5rem;
  color: var(--pine);

  &:hover,
  &:focus {
    color: var(--orange);
  }
}

.content-enter-active,
.content-leave-active {
  transition: opacity 0.5s ease;

  .form-modal-card {
    transition: transform 0.5s ease;
  }
}

.content-enter-from,
.content-leave-to {
  .form-modal-card {
    transform: translateY(-200%);
  }
}
</style>