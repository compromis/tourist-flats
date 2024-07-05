<template>
  <footer class="footer">
    <div class="container padded">
      <SiteLogo class="footer-logo" />
      <p>
        <strong>#QueNoTeTiren</strong>
        {{ $t('footer.campaign_by') }}
        <strong>Compromís València</strong>.
      </p>
      <a href="mailto:quenotetiren@compromis.net">quenotetiren@compromis.net</a>
      <a href="https://compromis.net">{{ $t('global.privacy_policy') }}</a>
    </div>
  </footer>
</template>

<style lang="scss" scoped>
.footer {
  margin-top: 10vh;

  &-logo {
    height: 1.5rem;
  }

  .container {
    display: flex;
    gap: var(--spacer-4);
    align-items: center;
  }

  p {
    margin: 0;
    margin-right: auto;
  }

  a {
    color: var(--white);

    &:hover {
      opacity: .75;
    }
  }
}

@include media('<md') {
  .footer {
    .container {
      flex-direction: column;
      justify-content: center;
      text-align: center;
    }
  }
}
</style>