<script setup>
defineProps({
  id: { type: String, required: true },
  content: { type: Array, required: true }
})

const openItem = ref(null)

function setItem(id) {
  openItem.value = (openItem.value === id) ? null : id
}
</script>

<template>
  <div :id="id" class="accordion">
    <div v-for="(item, i) in content" :key="i" class="accordion-item">
      <h4 class="accordion-title">
        <button
          type="button"
          :aria-expanded="openItem === i ? 'true' : 'false'"
          class="accordion-trigger"
          :aria-controls="`${id}-item-${i}`"
          :id="`${id}-button-${i}`"
          @click="setItem(i)"
        >
          <span class="accordion-title">
            {{ item.title }}
            <span class="accordion-icon">
              <Icon name="lucide:chevron-down" />
            </span>
          </span>
        </button>
      </h4>
      <Transition name="curtain">
        <div
          v-if="openItem === i"
          :id="`${id}-item-${i}`"
          role="region"
          :aria-labelledby="`${id}-button-${i}`"
          class="accordion-panel"
          v-html="item.text"
        />
      </Transition>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.accordion {
  &-title {
    display: flex;
    align-items: center;
    gap: var(--spacer-2);

    button {
      appearance: none;
      color: var(--pine);
      padding: var(--spacer-6);
      width: 100%;
      text-align: left;
      transition: .25s ease;
      border-top: 1.5px rgba($pine, .25) solid;
      font-size: var(--text-md);
      font-weight: 500;

      &[aria-expanded="true"] {
        font-weight: 900;

        .accordion-icon {
          transform: scaleY(-1);
        }
      }

      .accordion-icon {
        margin-inline-start: auto;
        transition: .25s ease;
      }
    }
  }

  &-item {
    transition: .25s ease;

    &:hover {
      background: var(--transpine);
    }

    &:first-child .accordion-title button {
      border-top: 0;
    }

    &:first-child {
      border-top-left-radius: .75rem;
      border-top-right-radius: .75rem;
    }

    &:last-child  {
      border-bottom-left-radius: .75rem;
      border-bottom-right-radius: .75rem;
    }
  }

  &-panel {
    padding: 0 var(--spacer-6) var(--spacer-6);
    font-size: var(--text-base);
    line-height: 1.5;
  }
}
</style>