export default function ApplicationLogo({ width = 'w-14', height = 'h-14' }) {
  return (
    <div className={`${width} ${height}`}>
      <img
        className="m-full object-cover"
        id="preview"
        src="images/website/logo.png"
        alt="Image Preview"
      />
    </div>
  );
}
