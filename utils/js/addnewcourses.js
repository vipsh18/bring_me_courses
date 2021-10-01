var checkboxes = document.querySelectorAll("input[type=checkbox][name=tg]");
		var tags = document.getElementById("tags");

		checkboxes.forEach(checkbox => {
			checkbox.addEventListener('change', () => {
				tags.value = Array.from(checkboxes).filter(i => i.checked).map(i => i.value)
			})
		})