/**
 * @return {string}
 */
window.getCSRF = () => {
    return document.querySelector('meta[name="csrf-token"]').getAttribute('content')
}
