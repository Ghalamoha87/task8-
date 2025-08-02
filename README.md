# SmartMethods Task 8

هذا مشروع بسيط باستخدام PHP وMySQL.

الهدف منه:
- نموذج تدخل فيه الاسم والعمر.
- يتم حفظ البيانات في قاعدة بيانات.
- تحت النموذج جدول يعرض كل البيانات.
- فيه زر "Toggle" يغير حالة المستخدم بين 0 و 1.

## المتطلبات:
- برنامج XAMPP
- Apache و MySQL شغالين
- قاعدة بيانات باسم: smart_methods
- جدول اسمه: users

## إنشاء الجدول:

في phpMyAdmin، نفّذ الكود هذا:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    age INT,
    status TINYINT(1) DEFAULT 0
);

```

## Result 


<img width="633" height="475" alt="image" src="https://github.com/user-attachments/assets/e9ca9a57-abde-4df8-9e1a-470085f2154c" />


