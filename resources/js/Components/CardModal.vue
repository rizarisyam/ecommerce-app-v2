<template>
  <teleport to="body">
    <transition name="fade">
      <div
        v-if="showing"
        class="
          fixed
          inset-0
          w-full
          h-screen
          flex
          items-center
          justify-center
          backdrop-blur-sm
          z-50
        "
        @click.self="close"
      >
        <div
          class="
            w-full
            max-w-2xl
            h-2/3
            bg-white
            shadow-md shadow-slate-500
            rounded-md
            p-8
            overflow-y-auto
          "
        >
          <button
            aria-label="close"
            class="absolute top-0 right-0 text-xl text-gray-500 my-2 mx-4"
            @click.prevent="close"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
            >
              <path
                d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"
              ></path>
            </svg>
          </button>

          <slot />
        </div>
      </div>
    </transition>
  </teleport>
</template>

<script>
export default {
  name: "CardModal",
  props: {
    showing: {
      required: true,
      type: Boolean,
    },
  },
  emits: ["close"],
  watch: {
      showing(value) {
          if(value) {
              return document.querySelector('body').classList.add('overflow-y-auto');
          }
          document.querySelector('body').classList.remove('overflow-hidden');
      }
  },
  methods: {
    close() {
      this.$emit("close");
    },
  },
};
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: all 0.4s;
}

.fade-enter,
.fade-leave-to {
    opacity: 0;
}
</style>
