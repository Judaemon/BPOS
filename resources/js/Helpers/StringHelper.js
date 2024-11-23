export function capitalizeFirstLetter(str) {
  return str.charAt(0).toUpperCase() + str.slice(1);
}

export function formatMonthYear(dateString) {
  const [year, month] = dateString.split('-');
  const date = new Date(year, month - 1);

  const options = { year: 'numeric', month: 'long' };
  return date.toLocaleDateString('en-US', options);
}

export function formatDateToReadable(dateString) {
  const [year, month] = dateString.split('-');
  const date = new Date(year, month - 1); // Month is 0-indexed
  return date.toLocaleString('en-US', { month: 'long', year: 'numeric' });
}

export function getMonthName(dateString) {
  const [year, month] = dateString.split('-');
  const date = new Date(year, month - 1); // Month is 0-indexed
  return date.toLocaleString('en-US', { month: 'long' });
}

export function snakeToNormal(text) {
  return text
      .split('_') // Split the string by underscores
      .map(word => word.charAt(0).toUpperCase() + word.slice(1)) // Capitalize each word
      .join(' '); // Join them with spaces
}
