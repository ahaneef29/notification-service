# The Real Challenge
### 1. Extensibility: How would you add a third channel (like WhatsApp or Push notifications) without rewriting existing code?
- Current implementation channels are the user-preferred channels, If we want to add a third channel, Dynamically we need to add a new channel in the PreferredChannels Model and can be used in `via` method. But if we want to add a custom channel means we need to update code. 

### 2. Resilience: What happens when the SMS provider is down but email service is working? How would you implement a fallback to a different SMS provider?
- SMS service are configurable, which means we can change the SMS provider in the config dynamically. 
- We can also add a fallback channel by implementing a factory pattern.

###  3. Scale: The business expects to send 50,000 notifications per hour during peak times. What parts of your design would break first? How would you address this?
- I can expect the most queue jobs will be failed, so we can add a retry mechanism in the queue job.

### 4. Idempotency: How do you prevent sending duplicate notifications if the same event is triggered twice?
- All Queue Jobs should be implemented `ShouldBeUnique`. So a job won't be duplicated.
